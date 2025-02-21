const BASE_PATH = document.head.querySelector("meta[name='base_path']").content;

// Fixed Buttons

const fixedBtn = document.querySelectorAll(".fixed-contactBtn");
fixedBtn.forEach((btn) => {
    const btnDetails = btn.querySelector(".fixed-contactDetails");
    btn.addEventListener("mouseenter", () => {
        btn.classList.add("hover");
        btnDetails.style.width = btnDetails.scrollWidth + "px";
    });
    btn.addEventListener("mouseleave", () => {
        btn.classList.remove("hover");
        btnDetails.style.width = "0";
    });
});

// Navbar Scroll

window.addEventListener("DOMContentLoaded", navbarBg);
window.addEventListener("scroll", navbarBg);

function navbarBg() {
    let navbar = document.querySelector(".navbar");

    if(!document.querySelector(".relative .navbar")) {  
        if (window.scrollY > 100) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    }
    else {
        navbar.classList.add("scrolled");
    }
}

// LINK BUTTONS

const linkButtons = document.querySelectorAll("button.link-btn");
linkButtons.forEach((button) => {
  button.addEventListener("click", () => {
      const link = button.getAttribute("href");
      if(link) {
        if(button.getAttribute("target") != "_self") {
            window.open(link, "_blank");
        }
        else {
            window.open(link, "_self");
        }
      }
  });
});

const phoneNumber = "905413070305"; // Phone Number Exp: 905301267153
const wpNumber = "905413070305"; // WhatsApp Number Exp: 905301267153
function wpLink(text) {
    if(text != null && text != "") {
        window.open("https://api.whatsapp.com/send?phone=" + wpNumber + "&text=" + text, "_blank");
    }
    else {
        window.open("https://api.whatsapp.com/send?phone=" + wpNumber, "_blank");
    }
}

function callLink(number) {
    if(number != null && number != "") {
        window.open("tel:" + number, "_self");
    }
    else {
        window.open("tel:" + phoneNumber, "_self");
    }
}

function randevu(link) {
    if(link) {
        window.open(link);
    }
    else {
        window.open("https://www.kolayrandevu.com/isletme/seval-sirakaya-guzellik-ve-sac?website=1");
    }
}


// Contact Focus Image

contactFocus();

window.addEventListener("resize", contactFocus);

function contactFocus() {
    const contactFocus = document.querySelectorAll(".focus.contact");

    contactFocus.forEach((contact) => {
        const contactIframe = contact.querySelector(".focus-img iframe");
        contactIframe.style.height = contact.querySelector(".focus-detail").scrollHeight + "px";
    });
}


// EMAIL Post

$(document).ready(function () {
    $("#emailForm").submit(function (event) {
        event.preventDefault(); // Sayfanın yenilenmesini engelle
        
        // <meta name="base_path"> içeriğini al
        var basePath = $("meta[name='base_path']").attr("content") || "";

        // Form verilerini al ve base_path'i ekle
        var formData = $(this).serialize() + "&base_path=" + encodeURIComponent(basePath);

        $.ajax({
            type: "POST",
            url: "assets/php/email_post.php",
            data: formData,
            success: function (response) {
                $("#result").html(response); // Yanıtı ekrana yazdır
                $("#emailForm")[0].reset(); // Formu sıfırla
            },
            error: function () {
                $("#result").html("<p style='color:red;'>Form gönderilirken hata oluştu.</p>");
            }
        });

        contactFocus();
    });
});


// MENUBAR

function menuBars(status) {
    const menus = document.querySelectorAll(".navbar .menus");
    if(status == "open") {
        menus.forEach((navMenu) => {
            navMenu.classList.add("active");
        });
        document.body.classList.add("lock");
    }
    else if(status == "close") {
        menus.forEach((navMenu) => {
            navMenu.classList.remove("active");
            document.body.classList.remove("lock");
        });
    }
}


// RESPONSIVE VIDEO


function updateVideoSources() {
    let videos = document.querySelectorAll(".responsive-video"); // Tüm video elementlerini seç
    let isMobile = window.innerWidth <= 768; // 768px altı mobil kabul ediliyor

    videos.forEach(video => {
        let source = video.querySelector("source");
        let newSrc = isMobile ? source.dataset.mobile : source.dataset.desktop;
        
        if (source.src !== newSrc) { // Eğer kaynak farklıysa değiştir
            source.src = newSrc;
            video.load(); // Yeni kaynağı yükle
        }
    });
  }

  // Sayfa yüklendiğinde ve yeniden boyutlandığında kontrol et
  window.addEventListener("resize", updateVideoSources);
  window.addEventListener("load", updateVideoSources);