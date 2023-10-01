var sds = document.getElementById();
var sd = document.getElementsByClassName("photo-profile")[0]

function previewImage(){
    var imgFile = document.querySelector("#img-file")
    var imgProfile = document.querySelector(".img-profile")

    const reader = new FileReader();

    reader.readAsDataURL(imgFile.files[0])

    reader.onload = function(readEvent){
        imgProfile.src = readEvent.target.result;
    }
}