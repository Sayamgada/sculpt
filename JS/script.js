document.addEventListener("DOMContentLoaded", () => {

  const themeToggle = document.getElementById("theme-toggle")
  const themeIcon = themeToggle.querySelector("i")
  const body = document.body


  const savedTheme = localStorage.getItem("theme") || "light-mode"
  body.classList.add(savedTheme)

  updateThemeIcon()


  themeToggle.addEventListener("click", () => {
    if (body.classList.contains("light-mode")) {
      body.classList.replace("light-mode", "dark-mode")
      localStorage.setItem("theme", "dark-mode")
    } else {
      body.classList.replace("dark-mode", "light-mode")
      localStorage.setItem("theme", "light-mode")
    }
    updateThemeIcon()
  })

  function updateThemeIcon() {
    if (body.classList.contains("dark-mode")) {
      themeIcon.classList.replace("bi-moon-fill", "bi-sun-fill")
    } else {
      themeIcon.classList.replace("bi-sun-fill", "bi-moon-fill")
    }
  }

  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault()

      const targetId = this.getAttribute("href")
      if (targetId === "#") return

      const targetElement = document.querySelector(targetId)
      if (targetElement) {
        const navbarHeight = document.querySelector(".navbar").offsetHeight
        const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - navbarHeight

        window.scrollTo({
          top: targetPosition,
          behavior: "smooth",
        })
      }
    })
  })

  const sections = document.querySelectorAll("section")
  const navLinks = document.querySelectorAll(".navbar-nav .nav-link")

  window.addEventListener("scroll", () => {
      let current = ""

    sections.forEach((section) => {
      const sectionTop = section.offsetTop
      const sectionHeight = section.clientHeight
      if (pageYOffset >= sectionTop - 200) {
        current = section.getAttribute("id")
      }
    })

    navLinks.forEach((link) => {
      link.classList.remove("active")
      if (link.getAttribute("href") === `#${current}`) {
        link.classList.add("active")
      }
    })
  })
})


