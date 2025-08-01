function toggleText(event) {
    event.preventDefault();
    const link = event.target;
    const berita = link.closest('.berita');
    const moreText = berita.querySelector('.more-text');

    if (!moreText) {
        console.warn("Elemen .more-text tidak ditemukan");
        return;
    }

    if (moreText.style.display === "none" || moreText.style.display === "") {
        moreText.style.display = "block";
        link.textContent = "Sembunyikan";
    } else {
        moreText.style.display = "none";
        link.textContent = "Baca selengkapnya";
    }
}
