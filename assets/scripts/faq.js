const faqButtons = document.querySelectorAll(".faq-btn");
const faqTexts = document.querySelectorAll(".faq-text");

faqButtons.forEach(function(btn) {
    btn.addEventListener('click', function() {
        const currentFaqText = this.nextElementSibling;
        const currentFaqParagraph = currentFaqText.querySelector(".faq-paragraph");

        faqButtons.forEach(function(faqBtn) {
            faqBtn.classList.remove('active');
        });

        faqTexts.forEach(function(faqText) {
            if (faqText !== currentFaqText) {
                faqText.style.height = '0px';
                faqText.classList.remove('active');
            }
        });

        if (currentFaqText.classList.contains('active')) {
            currentFaqText.style.height = '0px';
            currentFaqText.classList.remove('active');
        } else {
            currentFaqText.style.height = 'auto';
            const fullHeight = currentFaqParagraph.offsetHeight + 20;

            currentFaqText.style.height = '0px';
            requestAnimationFrame(function() {
                btn.classList.add('active');
                currentFaqText.style.height = fullHeight + 'px';
                currentFaqText.classList.add('active');
            });
        }
    });
});

// FAQ Object Text Shadow
var faqObj = document.getElementById("faq-obj");
var shadow = '';
if(theme = "black") {
    var shadowColor = "#111";
}
else {
    var shadowColor = "rgb(200,200,200)";
}
for(var i = 0; i < 6; i++) {
    shadow += (shadow ? ',' : '') + -i * 1 + 'px ' + i * 1 + 'px 0 ' + shadowColor;
}
faqObj.style.textShadow = shadow;