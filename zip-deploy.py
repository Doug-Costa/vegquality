import os
import zipfile

zip_filename = 'vegquality-deploy.zip'
items_to_compress = [
    "app",
    "bootstrap",
    "config",
    "database",
    "public",
    "resources",
    "routes",
    "storage",
    "vendor",
    "artisan",
    "composer.json",
    "composer.lock",
    "package.json"
]

if os.path.exists(zip_filename):
    try:
        os.remove(zip_filename)
        print("Removed old zip file.")
    except Exception as e:
        print(f"Error removing old zip: {e}")

print("Starting compression (generating Linux-compatible paths)...")
count = 0
with zipfile.ZipFile(zip_filename, 'w', zipfile.ZIP_DEFLATED) as zipf:
    for item in items_to_compress:
        if not os.path.exists(item):
            print(f"Warning: {item} does not exist, skipping.")
            continue
        if os.path.isdir(item):
            for root, dirs, files in os.walk(item):
                # Filter out .git, .github and temporary runtime folders that cause locks
                dirs_to_ignore = ['.git', '.github']
                # Only ignore sessions, cache, logs if we are walking inside storage
                if 'storage' in root.split(os.sep):
                    dirs_to_ignore.extend(['sessions', 'cache', 'logs'])
                dirs[:] = [d for d in dirs if d not in dirs_to_ignore]
                
                for file in files:
                    if file in ('.gitignore', '.gitattributes', '.gitkeep', 'hot'):
                        continue
                    file_path = os.path.join(root, file)
                    # Create archive name with forward slashes
                    arcname = os.path.relpath(file_path, start=os.getcwd())
                    arcname = arcname.replace('\\', '/')
                    try:
                        zipf.write(file_path, arcname)
                        count += 1
                        if count % 1000 == 0:
                            print(f"Added {count} files...")
                    except PermissionError as pe:
                        print(f"Warning: Permission denied for {file_path} (likely locked). Skipping. Details: {pe}")
                    except Exception as e:
                        print(f"Warning: Error zipping {file_path}. Skipping. Details: {e}")
        else:
            arcname = item.replace('\\', '/')
            try:
                zipf.write(item, arcname)
                count += 1
            except PermissionError as pe:
                print(f"Warning: Permission denied for {item} (likely locked). Skipping. Details: {pe}")
            except Exception as e:
                print(f"Warning: Error zipping {item}. Skipping. Details: {e}")

print(f"Successfully created {zip_filename} containing {count} files with forward slashes!")
