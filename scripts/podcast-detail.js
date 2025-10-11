const params=new URLSearchParams(window.location.search);
const id=params.get("id");
console.log("id podcast: ",id)

const episodeselect=document.getElementById("ep"+id);
episodeselect.classList.remove("d-none")

//--botton share--//

const currentUrl = window.location.href; // URL completa actual
const text = encodeURIComponent("Escucha este episodio del podcast de Paola Guzmán");

const facebookBtn = document.getElementById("share-fb");
const twitterBtn = document.getElementById("share-tw");

if (facebookBtn && twitterBtn) {
  facebookBtn.href =`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(currentUrl)}`;
  twitterBtn.href = `https://twitter.com/intent/tweet?url=${encodeURIComponent(currentUrl)}&text=${text}`;
}