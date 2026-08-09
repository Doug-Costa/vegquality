<?php
header('Content-Type: text/plain; charset=utf-8');

$username = 'vegquality@vegquality.com.br';
$hosts = [
    'mail.vegquality.com.br',
    '186.232.181.114'
];
$passwords = [
    'veg@#010203',
    'S:veg@#010203'
];

function read_smtp_response($socket, $prefix = '     ') {
    $last_line = '';
    while ($line = fgets($socket, 515)) {
        echo $prefix . trim($line) . "\n";
        $last_line = $line;
        if (strlen($line) >= 4 && $line[3] === ' ') {
            break;
        }
    }
    return $last_line;
}

echo "=== INICIANDO TESTE SMTP CORRIGIDO (cPanel) ===\n\n";

foreach ($hosts as $host) {
    foreach ($passwords as $password) {
        echo "Testando Host: [$host] | Senha: \"$password\"\n";
        
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ]);
        
        $socket = @stream_socket_client("ssl://$host:465", $errno, $errstr, 5, STREAM_CLIENT_CONNECT, $context);
        
        if (!$socket) {
            echo "     ❌ Falha na conexão SSL 465: $errstr ($errno)\n\n";
            continue;
        }
        
        echo "     [Conectado] Lendo saudação do servidor:\n";
        read_smtp_response($socket, "       ");
        
        echo "     [Enviando EHLO]\n";
        fwrite($socket, "EHLO localhost\r\n");
        read_smtp_response($socket, "       ");
        
        echo "     [Enviando AUTH LOGIN]\n";
        fwrite($socket, "AUTH LOGIN\r\n");
        $auth_response = read_smtp_response($socket, "       ");
        
        if (strpos($auth_response, '334') === 0) {
            echo "     [Enviando Usuário]\n";
            fwrite($socket, base64_encode($username) . "\r\n");
            $user_response = read_smtp_response($socket, "       ");
            
            if (strpos($user_response, '334') === 0) {
                echo "     [Enviando Senha]\n";
                fwrite($socket, base64_encode($password) . "\r\n");
                $pass_response = read_smtp_response($socket, "       ");
                
                if (strpos($pass_response, '235') === 0) {
                    echo "     🎉 [SUCESSO!] Autenticação AUTORIZADA com esta senha!\n\n";
                    echo "     -> CONFIGURAÇÃO CORRETA PARA SEU .ENV:\n";
                    echo "        MAIL_HOST=$host\n";
                    echo "        MAIL_PASSWORD=\"$password\"\n";
                    echo "        MAIL_PORT=465\n";
                    echo "        MAIL_ENCRYPTION=ssl\n";
                    echo "        MAIL_SCHEME=smtps\n\n";
                    fwrite($socket, "QUIT\r\n");
                    fclose($socket);
                    exit;
                } else {
                    echo "     ❌ [FALHA] Senha rejeitada pelo servidor.\n";
                }
            } else {
                echo "     ❌ [FALHA] Usuário rejeitado pelo servidor.\n";
            }
        } else {
            echo "     ❌ [FALHA] Servidor não aceitou AUTH LOGIN.\n";
        }
        
        fwrite($socket, "QUIT\r\n");
        fclose($socket);
        echo "\n";
    }
}

echo "=== FIM DO TESTE DETALHADO ===\n";
