document.addEventListener("DOMContentLoaded", () => {
  // -------- Episode selection via ?id= ----------
  const params = new URLSearchParams(window.location.search);
  const idParam = (params.get("id") || "").trim();

  // Select all episode containers (use class="episode" on each)
  const allEpisodes = document.querySelectorAll(".episode");

  // Helper: hide all episodes first
  allEpisodes.forEach(el => el.classList.add("d-none"));

  // Try to find a matching episode by id="ep{n}"
  let selected = null;
  if (idParam) {
    const target = document.getElementById("ep" + idParam);
    if (target) selected = target;
  }

  // Fallback: show the first episode if no valid id or not found
  if (!selected && allEpisodes.length > 0) selected = allEpisodes[0];

  if (selected) {
    selected.classList.remove("d-none");
    // Optional: scroll to the visible episode if needed
    // selected.scrollIntoView({ behavior: "smooth", block: "start" });
  }

  // --------- Share buttons ----------
  const currentUrl = window.location.href;
  const shareText = "Escucha este episodio del podcast de Paola Guzmán";

  const facebookBtn = document.getElementById("share-fb");
  const twitterBtn  = document.getElementById("share-tw");
  const whatsappBtn = document.getElementById("share-wa");
  const nativeBtn   = document.getElementById("share-native");

  if (facebookBtn) {
    facebookBtn.href = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(currentUrl)}`;
    facebookBtn.target = "_blank";
    facebookBtn.rel = "noopener";
  }

  if (twitterBtn) {
    twitterBtn.href = `https://twitter.com/intent/tweet?url=${encodeURIComponent(currentUrl)}&text=${encodeURIComponent(shareText)}`;
    twitterBtn.target = "_blank";
    twitterBtn.rel = "noopener";
  }

  if (whatsappBtn) {
    // Works on mobile/desktop WhatsApp
    whatsappBtn.href = `https://api.whatsapp.com/send?text=${encodeURIComponent(shareText + " " + currentUrl)}`;
    whatsappBtn.target = "_blank";
    whatsappBtn.rel = "noopener";
  }

  // Web Share API (native share panel on mobile/modern browsers)
  if (nativeBtn && navigator.share) {
    nativeBtn.addEventListener("click", async (e) => {
      e.preventDefault();
      try {
        await navigator.share({
          title: "Podcast de Paola Guzmán",
          text: shareText,
          url: currentUrl
        });
      } catch (_) {
        // user canceled or not supported—silently ignore
      }
    });
  } else if (nativeBtn) {
    // Hide native button if not supported
    nativeBtn.classList.add("d-none");
  }
});
