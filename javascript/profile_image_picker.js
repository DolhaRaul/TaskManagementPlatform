/**
 * This function limits the number of possible profile pictures(that
 * the user may pick) to two, OR displays all the possible profile
 * pictures, depending on the context (the items are ALREADY displayed or not)
 */
function limit_profile_pictures(){
    let listContainer = document.getElementById("imgProfilePick");
    let profilePictures = listContainer.children;
    let firstTwoItems = 2;
    for(let index = firstTwoItems; index < profilePictures.length; index++)
        if(profilePictures[index].style.display === "none")
            profilePictures[index].style.display = "inline-block";
    else
            profilePictures[index].style.display = "none";
}



/**
 * A function that allows on click for the specific image to pick
 * it as the profile image
 */
function profile_picture_choose(){
    let array_gallery = [...document.getElementById("imgProfilePick").children];
    array_gallery.forEach(image => image.addEventListener("click", function (){
        let iconValue = image.firstChild.innerHTML;
        document.getElementById("imageContainer").innerHTML = "<i>" + iconValue + "</i>";
        alert("Profile picture has changed!");
    }))
}

/**
 * Imaginea din container ul ce contine header ul "About Owner"
 * o facem sa se comporte ca un pop up Box on click!
 */
function display_modal_image() {
    // Get the modal
    let modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
    let img = document.getElementById("myImg");
    let modalImg = document.getElementById("img01");
    let captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    let span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
}
