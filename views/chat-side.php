<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
    ?>
    <aside>
        <?php 
        include '../inc/chat-aside.php';
        ?>
    </aside>

    <section>
        <?php include_once '../inc/chat.php';?>
    </section>
        <?php include_once '../inc/footer.php';?>

<script>
    //Invocacion de las constantes...
const form =document.querySelector(".typing-area");
const incoming_id = form.querySelector(".incoming_id").ariaValueMax;
const inputField = form.querySelector(".input-field");
const sendBtn = form.querySelector("button");
const chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
    e.preventDefault();
}

inputField.focus();

inputField.onkeyup = () => {
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    } else {
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/func/chat/insert-chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = "";
                scrollToBottom();
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
chatBox.onmouseenter = () => {
    chatBox.classList.remove("active");
}

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/func/chat/get-chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){
                    scrollToBottom();
                }
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
},500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}
</script>
</body>
</html>