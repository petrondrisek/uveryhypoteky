const locations = [
    {
        coords: [49.59074, 17.27748],
        header: "RCO, Jeremenkova 40b, Olomouc",
        body: "Krajská kancelář, <a href=\"mailto:olomouc@uveryhypoteky.eu\">olomouc@uveryhypoteky.eu</a><a href=\"https://mapy.cz/?pid=35909869\" target=\"_blank\" class=\"btn btn-primary\">Zobrazit panorama</a>"
    },
    {
        coords: [50.08758, 14.41536],
        header: "Křížovnická 86/6, Praha",
        body: "Krajská kancelář, <a href=\"mailto:praha@uveryhypoteky.eu\">praha@uveryhypoteky.eu</a><a href=\"https://mapy.cz/?pid=70273503\" target=\"_blank\" class=\"btn btn-primary\">Zobrazit panorama</a>"
    },
    {
        coords: [49.22447, 17.65914],
        header: "Vavrečková 7074, Zlín",
        body: "Regionální kancelář, <a href=\"mailto:zlin@uveryhypoteky.eu\">zlin@uveryhypoteky.eu</a><a href=\"https://mapy.cz/?pid=69324961\" target=\"_blank\" class=\"btn btn-primary\">Zobrazit panorama</a>"
    }
];


jQuery(document).ready(() => {
   var map = L.map('mapa').setView([49.832, 15.872], 7);

   L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
   }).addTo(map);

   locations.forEach((loc) => {
        L.marker(loc.coords).addTo(map).bindPopup(
            `<h4>${loc.header}</h4><hr/><p>${loc.body}</p>`
        );
   });
});
