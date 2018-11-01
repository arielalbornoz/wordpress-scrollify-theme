const fs = require('fs-extra');
const download = require('download');
const targz = require('targz');
const mv = require('node-mv');

const decompress = () => {
  console.log('Unpacking...');
  targz.decompress(
    {
      src: 'latest.tar.gz',
      dest: 'dist'
    },
    err => {
      if (err) {
        console.log(err);
      } else {
        deleteFile();
        moveFolder();
      }
    }
  );
};

const downloadFile = () => {
  console.log('Downloading Wordpress...');
  download('https://wordpress.org/latest.tar.gz').then(data => {
    fs.writeFileSync('latest.tar.gz', data);
    decompress();
  });
};

const deleteFile = () => {
  fs.remove('latest.tar.gz');
};

const deleteFolder = () => {
  fs.remove('dist/wordpress');
  console.log('Wordpress is downloaded');
};

const moveFolder = () => {
  fs
    .copy('dist/wordpress', 'dist')
    .then(deleteFolder)
    .catch(err => console.log(err));
};

downloadFile();
