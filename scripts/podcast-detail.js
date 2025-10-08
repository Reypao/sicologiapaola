const params=new URLSearchParams(window.location.search);
const id=params.get("id");
console.log("id podcast: ",id)

const episodeselect=document.getElementById("ep"+id);
episodeselect.classList.remove("d-none")