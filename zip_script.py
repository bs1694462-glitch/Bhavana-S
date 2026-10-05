import zipfile
import os

def zipdir(path, ziph):
    for root, dirs, files in os.walk(path):
        for file in files:
            ziph.write(os.path.join(root, file), 
                       os.path.relpath(os.path.join(root, file), 
                                       os.path.join(path, '.')))

if __name__ == '__main__':
    zipf = zipfile.ZipFile('indian-short-movie-pure-php.zip', 'w', zipfile.ZIP_DEFLATED)
    zipdir('final-php-app', zipf)
    zipf.close()
