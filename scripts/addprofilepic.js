

function profilepicadd(pic){
    let file;
    const droparea = document.querySelector(".profilepiccon");
    const input = document.getElementById("image1");
    input.click();

    input.addEventListener("change", function(){
        file = this.files[0];
        showImage();
    });

    
    function showImage(){

        let filetype = file.type;
        //console.log(filetype);

        let validExtensions = ["image/jpeg","image/png","image/jpg"];
        if(validExtensions.includes(filetype)){
            //console.log("valid file type");
            let fileReader = new FileReader();
            fileReader.onload = ()=>{
                let fileURL = fileReader.result; 
                let contenttag = `<img src="${fileURL}" alt="" width="100" height="100">`
                droparea.innerHTML = contenttag;

                document.getElementById("imageupdateind").value = 1;
            }
            fileReader.readAsDataURL(file); 
        }else{
            //console.log("file type is not valid");
            alert("This file type is not valid!");
            input.value = ""; 
            document.getElementById("imageupdateind").value = 0;
            droparea.innerHTML = `<img src="${pic}" alt="" width="100" height="100">`;

        }
    }

}
