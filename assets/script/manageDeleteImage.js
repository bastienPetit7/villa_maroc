
let links = document.querySelectorAll("[data-delete]");

const deleteImage = () => {

// window.onload = () => {
    // Gestion des liens supprimer

    // On boucle sur links 
    for (let link of links) {
        
        link.addEventListener('click', function(e){
            // On empêche la navigation
            e.preventDefault(); 

            // On demande confirmation
            if(confirm("Voulez vous supprimer cette image? "))
            {
                // On envoie une requete AJAX vers le href du lien vec la methode DELETE
                fetch(this.getAttribute("href"), {
                    method : "DELETE", 
                    headers : {
                        "X-Requested-With" : "XMLHttpRequest", 
                        "Content-Type" : "application/json"
                    }, 
                    body : JSON.stringify({"_token": this.dataset.token})
                }).then(
                    // On recupere la reponse en JSON
                    response => response.json()

                ).then( data => {
                    if(data.success)
                        this.parentElement.remove()
                    else
                        alert(data.error)
                }).catch(e => alert(e))

            }

        })
    }
// }

}

export default deleteImage(); 