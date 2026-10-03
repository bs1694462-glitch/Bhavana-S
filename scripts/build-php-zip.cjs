const fs = require('fs');
const path = require('path');
const AdmZip = require('adm-zip');

function buildPHPZip() {
  const zip = new AdmZip();
  const rootDir = __dirname;
  
  const filesToInclude = [
    'index.php',
    'discover.php',
    'watchlist.php',
    'filmmakers.php',
    'submit-film.php',
    'about.php',
    'contact.php',
    'vercel.json',
    'README-PHP.md'
  ];

  const foldersToInclude = [
    'includes',
    'admin',
    'assets'
  ];

  console.log('Building Pure PHP Project ZIP...');

  filesToInclude.forEach(file => {
    const filePath = path.join(rootDir, file);
    if (fs.existsSync(filePath)) {
      zip.addLocalFile(filePath, '');
      console.log(`Added: ${file}`);
    }
  });

  foldersToInclude.forEach(folder => {
    const folderPath = path.join(rootDir, folder);
    if (fs.existsSync(folderPath)) {
      zip.addLocalFolder(folderPath, folder);
      console.log(`Added folder: ${folder}/`);
    }
  });

  const outputPath = path.join(rootDir, 'indian-short-movie-pure-php.zip');
  zip.writeZip(outputPath);
  console.log(`Successfully created: ${outputPath}`);
}

buildPHPZip();
