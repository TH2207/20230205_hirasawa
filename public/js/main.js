document.getElementById("postcode").addEventListener("blur", function (e) {
  const s1 = e.currentTarget.value
  const s2 = s1.replace(/[Ａ-Ｚａ-ｚ０-９]/g, (v) => {
          return String.fromCharCode(v.charCodeAt(0) - 0xFEE0)
  })
  .replace(/[-－﹣−‐⁃‑‒–—﹘―⎯⏤ーｰ─━]/g, '-');
        document.getElementById("postcode").value = s2
})
