document.addEventListener("DOMContentLoaded", () => {
  const videoThumbnails = document.querySelectorAll(".video-thumbnail")

  const videoModal = document.getElementById("videoModal")
  const videoModalTitle = document.getElementById("videoModalLabel")
  const videoFrame = document.getElementById("videoFrame")

  const modal = new bootstrap.Modal(videoModal)

  videoThumbnails.forEach((thumbnail) => {
    thumbnail.addEventListener("click", function () {
      const videoTitle = this.nextElementSibling.querySelector("h5").textContent
      const videoEmbed = this.getAttribute("data-video-embed")
      videoModalTitle.textContent = videoTitle
      videoFrame.src = videoEmbed

      modal.show()
    })
  })

  videoModal.addEventListener("hidden.bs.modal", () => {
    videoFrame.src = ""
  })
})

