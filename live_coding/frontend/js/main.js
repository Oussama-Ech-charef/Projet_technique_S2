



const API = '../../backend/admin/api/gestionCategoriy.php';


const formcategory = document.getElementById("form_category");
const nomcategory = document.getElementById("nom_category");
const description = document.getElementById("description");
const formtabel = document.getElementById("form_tabel");







function affichcatetegory() {
    fetch(API)
    .then(response => response.json())
    .then(category => {

        formtabel.innerHTML = "";


        category.forEach(cat => {
            formtabel.insertAdjacentHTML("beforeend", `
                    <tr>
                        <td>${cat.id_category}</td>
                        <td>${cat.nom_category}</td>
                        <td>${cat.description}</td>
                    </tr>
                
                `


            );
        });
    })
    .catch(error => {
        console.error(error)
        
    })
}

document.addEventListener("DOMContentLoaded", () => affichcatetegory() );


formcategory.addEventListener("submit", (event) => {
    event.preventDefault();

    fetch(API,  {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body:JSON.stringify({
            nom_category:nomcategory.value,
            description:description.value
        })
    })
    .then(response => response.json())
    .then(data => {
        formcategory.reset()
        affichcatetegory();
})

})




