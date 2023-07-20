$(document).ready(function () {
  $(".voiture").addClass("Toutes");

  $(".voiture-bouton").click(function () {
    $(this).parent().siblings(".voiture-plus-details").slideToggle(1000);
  });

  $("#filtrer").on("click", function () {
    var marqueSelectionnee = $("#marque").val();
    var prixSelectionne = $("#prix").val();
    var anneeSelectionnee = $("#annee").val();

    $(".voiture").each(function () {
      var voitureMarque = $(this).data("marque");
      var voiturePrix = Number($(this).data("prix"));
      var voitureAnnee = Number($(this).data("annee"));

      var anneeMin, anneeMax;
      if (anneeSelectionnee === "2000") {
        anneeMin = 2000;
        anneeMax = 2009;
      } else if (anneeSelectionnee === "2010") {
        anneeMin = 2010;
        anneeMax = 2019;
      } else if (anneeSelectionnee === "2020") {
        anneeMin = 2020;
        anneeMax = 2023;
      }

      var prixMin, prixMax;
      if (prixSelectionne === "0") {
        prixMin = 0;
        prixMax = 4999;
      } else if (prixSelectionne === "5000") {
        prixMin = 5000;
        prixMax = 9999;
      } else if (prixSelectionne === "10000") {
        prixMin = 10000;
        prixMax = 14999;
      } else if (prixSelectionne === "15000") {
        prixMin = 15000;
        prixMax = 19999;
      }

      if (
        (marqueSelectionnee === "Toutes" ||
          voitureMarque === marqueSelectionnee) &&
        (prixSelectionne === "" ||
          (voiturePrix >= prixMin && voiturePrix <= prixMax)) &&
        (anneeSelectionnee === "" ||
          (voitureAnnee >= anneeMin && voitureAnnee <= anneeMax))
      ) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });
});
