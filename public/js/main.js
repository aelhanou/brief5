

let inputs = document.querySelectorAll(".input1");
let saveButton = document.querySelectorAll("#Save");
let cancelButton = document.querySelectorAll("#cancel");
let EditButton = document.querySelectorAll("Edit");
const editForm = document.querySelector("#editForm");


let inp = Array.from(inputs)
let svb = Array.from(saveButton)
let cnlb = Array.from(cancelButton)



svb.map(e=>{
    e.style.display='none';
})
inp.map(e=>{
    e.disabled = true
})
cnlb.map(e=>{
    e.style.display='none';
})

if(document.querySelector("#dt") != undefined)
{
    if(document.querySelector("#dt").getAttribute("data-data") == -1)
    {
        let popUp = document.createElement("div");
        popUp.classList.add("popUp");
        popUp.innerHTML = "OooPs ... There's nothing to edit ..go to reservation page and try to edit something there !!";

        document.body.appendChild(popUp);

    }
}


let edit = (event)=>{
    
    if(!event.target.getAttribute("form"))
    {
        event.preventDefault();
    }
    

    event.target.parentNode.parentElement.querySelector('[name="Save"]').style.display='inherit';
    event.target.parentNode.parentElement.querySelector('[name="Cancel"]').style.display='inherit';
    if(event.target.parentNode.parentElement.querySelectorAll('input')[0].getAttribute("name") == "gr_name")
    {

        

    event.target.parentNode.parentElement.querySelector('[name="gr_name"]').disabled = false
    event.target.parentNode.parentElement.querySelector('[name="effectif_numb"]').disabled = false



    event.target.parentNode.parentElement.querySelector('[name="gr_name"]').setAttribute("form","editForm");
    event.target.parentNode.parentElement.querySelector('[name="effectif_numb"]').setAttribute("form","editForm");
    event.target.parentNode.parentElement.querySelector('[name="Edit"]').setAttribute("form","editForm");
    event.target.parentNode.parentElement.querySelector('[name="Save"]').setAttribute("form","editForm");
    event.target.parentNode.parentElement.querySelector('[name="Cancel"]').setAttribute("form","editForm");
    }



    if(event.target.parentNode.parentElement.querySelectorAll('input')[0].getAttribute("name") == "salle_name")
    {
    
       
    event.target.parentNode.parentElement.querySelector('[name="salle_name"]').disabled = false
    event.target.parentNode.parentElement.querySelector('[name="capacity_numb"]').disabled = false



    event.target.parentNode.parentElement.querySelector('[name="salle_name"]').setAttribute("form","editForm");
    event.target.parentNode.parentElement.querySelector('[name="capacity_numb"]').setAttribute("form","editForm");
    event.target.parentNode.parentElement.querySelector('[name="Edit"]').setAttribute("form","editForm");
    event.target.parentNode.parentElement.querySelector('[name="Save"]').setAttribute("form","editForm");
    event.target.parentNode.parentElement.querySelector('[name="Cancel"]').setAttribute("form","editForm");
    }
    
    if(event.target.parentNode.parentElement.querySelectorAll('input')[0].getAttribute("name") == "matiere_name")
    {
    
   
    event.target.parentNode.parentElement.querySelector('[name="matiere_name"]').disabled = false



    event.target.parentNode.parentElement.querySelector('[name="matiere_name"]').setAttribute("form","editForm");
    event.target.parentNode.parentElement.querySelector('[name="Edit"]').setAttribute("form","editForm");
    event.target.parentNode.parentElement.querySelector('[name="Save"]').setAttribute("form","editForm");
    event.target.parentNode.parentElement.querySelector('[name="Cancel"]').setAttribute("form","editForm");
    }

    
    editForm.action = event.target.href;


    event.target.parentNode.parentElement.querySelector('[name="Delete"]').style.display = "none";
    event.target.parentNode.parentElement.querySelector('[name="Edit"]').style.display = "none";
}



let Delete = (event)=>{
    
    

    if(event.target.parentNode.parentElement.querySelectorAll('input')[0] == "gr_name")
    {
        event.target.parentNode.parentElement.querySelector('[name="gr_name"]').setAttribute("form","editForm");
        event.target.parentNode.parentElement.querySelector('[name="effectif_numb"]').setAttribute("form","editForm");
    }
    else if(event.target.parentNode.parentElement.querySelectorAll('input')[1] == "salle_name")
    {
        event.target.parentNode.parentElement.querySelector('[name="salle_name"]').setAttribute("form","editForm");
        event.target.parentNode.parentElement.querySelector('[name="capacity_numb"]').setAttribute("form","editForm");
    }
    
    event.target.parentNode.parentElement.querySelector('[name="Edit"]').setAttribute("form","editForm");

    event.target.parentNode.parentElement.querySelector('[name="Delete"]').setAttribute("form","editForm");
    
}




