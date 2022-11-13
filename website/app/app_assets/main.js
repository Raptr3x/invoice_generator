
async function getTemplate() {
    const response = await fetch("invoice_templates/default.html")
    const text = await response.text()
    $("#invoice_parent").append(text)

    const editable_tags = ["li", "h1", "h2", "h3", "h4", "h5", "h6", "p", "th", "td", "span"];

    for(i in editable_tags){
        $(editable_tags[i]).attr('contenteditable', 'true');
    }
}

window.onload = function () {

    getTemplate()

    $("#download").on("click", () => {
            const invoice = this.document.getElementById("invoice");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'myfile.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };

            html2pdf().from(invoice).set(opt).save();
    })


}