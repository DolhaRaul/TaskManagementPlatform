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
