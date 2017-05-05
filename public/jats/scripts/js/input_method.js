 // Load the Google Transliterate API
      google.load("elements", "1", {
            packages: "transliteration"
          });

      function onLoad() {
        var options = {
          sourceLanguage: 'en', // or google.elements.transliteration.LanguageCode.ENGLISH,
          destinationLanguage: ['hi'], // or [google.elements.transliteration.LanguageCode.HINDI],
          shortcutKey: 'ctrl+g',
          transliterationEnabled: true
        };
        // Create an instance on TransliterationControl with the required
        // options.
        var control =
            new google.elements.transliteration.TransliterationControl(options);

        // Enable transliteration in the textfields with the given ids.
        var elements = ["id1_1", 
        "id5_1","id5_2","id5_3","id5_4", 
        "id6_1","id6_2","id6_3","id6_4",
        "id7_1","id7_2","id7_3","id7_4","id7_5","id7_6",
        "id8_1","id8_2",
        "id9_1","id9_2","id9_3","id9_4","id9_5","id9_6",
        "id998","id999",
        "id10_1","id10_2","id10_3","id10_4","id10_5","id10_6","id10_7",
        "id11_1","id11_2","id11_3",
        "id12_1","id12_2","id12_3","id12_4","id12_5","id12_6","id12_7","id12_8","id12_9","id12_10","id12_11","id12_12","id12_13","id12_14","id12_15",
        "id14_1","id14_2"];
        control.makeTransliteratable(elements);

        // Show the transliteration control which can be used to toggle between
        // English and Hindi.
        control.showControl('translControl');
      }
      google.setOnLoadCallback(onLoad);
