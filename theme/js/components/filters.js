//
// Gebruiker Centraal - filters.js
// ----------------------------------------------------------------------------------
// Functionaliteit voor het toevoegen van een active class aan filters
// ----------------------------------------------------------------------------------
// @package gebruiker-centraal
// @author  Tamara de Haas
//

  var filterLabel = $('.filter__item label');

  filterLabel.click(function () {
    var formItem = $(this).parent();

    if (formItem.find('input:checked').length) {
      formItem.removeClass('filter-active');
    } else {
      formItem.addClass('filter-active');
    }

  });

// =========================================================================================================
