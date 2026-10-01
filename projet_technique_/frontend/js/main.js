const API_URL = "../../backend/admin/api/gestionCategoriy.php";

const tabele = document.getElementById("table_category");


const form = document.getElementById("form_category");

const btnajoute = document.getElementById("btn_addcategory");

const btnannuler = document.getElementById("btn_annuler");

const sectionform = document.getElementById("section_form");

const nomcategory = document.getElementById("nom_category");

const description = document.getElementById("description");




function afficherCategory () {

    fetch(API_URL)
    .then(response => response.json())
    .then(category => {
        
            tabele.innerHTML = "";

            category.forEach(cat => {
                tabele.insertAdjacentHTML("beforeend", `
                    
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-4">
                            ${cat.id_category}
                        </td>
                        <td class="p-4">
                            ${cat.nom_category}
                        </td>
                        <td class="p-4">
                            ${cat.description}
                        </td>
                    </tr>
                    
                    `);
                
            });
        
    })
    .catch(error => {
        console.error(error);
        
    });



}



btnajoute.addEventListener("click", () => {
    sectionform.classList.remove("hidden")
});

btnannuler.addEventListener("click", () => {
    sectionform.classList.add("hidden")
    form.reset()
});


document.addEventListener("DOMContentLoaded", () => afficherCategory());

    form.addEventListener("submit", (event) => {
        event.preventDefault();
        fetch(API_URL, {
            method: "POST",
            headers: {"Content-yTpe":"application/json"},
            body:JSON.stringify({
                nom_category:nomcategory.value,
                description:description.value
            })

        })
        .then(response => response.json())
        .then(data => {
            form.reset()
            sectionform.classList.add("hidden")
            afficherCategory();
            
        })
        .catch(error => {

            console.error(error)
        }
            
        )
    })

