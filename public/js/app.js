document.getElementById('openProfileModal').addEventListener("click",function(){
    var profileModal=new bootstrap.Modal(document.getElementById('profileModal'));
    profileModal.show();
});
document.getElementById('openPasswordModal').addEventListener("click",function(){
    var passwordModal=new bootstrap.Modal(document.getElementById('passwordModal'));
    passwordModal.show();
});