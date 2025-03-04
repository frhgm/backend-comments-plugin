document.getElementById('commentInput').addEventListener('click', function() {
    document.getElementById('buttonContainer').style.display = 'flex';
});

document.getElementById('cancelButton').addEventListener('click', function() {
    document.getElementById('buttonContainer').style.display = 'none';
    document.getElementById('commentInput').value = '';
}); 