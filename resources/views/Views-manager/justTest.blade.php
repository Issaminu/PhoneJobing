<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    {{-- <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" /> --}}
    <link rel="stylesheet" href="css/tags.css">
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

</head>

<body>
    <form action="tagsPost" method="post">

        <input name='tags' value='abatisse2@nih.gov, Justinian Hattersley'>
        <button type="submit">Save</button>
    </form>

    <script>
        var inputElm = document.querySelector('input[name=tags]');

        function tagTemplate(tagData) {
            return `
        <tag title="${tagData.email}"
                contenteditable='false'
                spellcheck='false'
                tabIndex="-1"
                class="tagify__tag ${tagData.class ? tagData.class : ""}"
                ${this.getAttributes(tagData)}>
            <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
            <div>
               
                <span class='tagify__tag-text'>${tagData.name}</span>
            </div>
        </tag>
    `
        }

        function suggestionItemTemplate(tagData) {
            return `
        <div ${this.getAttributes(tagData)}
            class='tagify__dropdown__item ${tagData.class ? tagData.class : ""}'
            tabindex="0"
            role="option">
            
            <strong>${tagData.name}</strong>
            <span>${tagData.email}</span>
        </div>
    `
        }

        // initialize Tagify on the above input node reference
        var tagify = new Tagify(inputElm, {
            tagTextProp: 'name', // very important since a custom template is used with this property as text
            enforceWhitelist: true,
            skipInvalid: true, // do not remporarily add invalid tags
            dropdown: {
                closeOnSelect: false,
                enabled: 0,
                classname: 'users-list',
                searchKeys: ['name',
                    'email'
                ] // very important to set by which keys to search for suggesttions when typing
            },
            templates: {
                tag: tagTemplate,
                dropdownItem: suggestionItemTemplate
            },
            whitelist: [{
                    "value": 1,
                    "name": "Justinian Hattersley",
                    "email": "jhattersley0@ucsd.edu"
                },
                {
                    "value": 2,
                    "name": "Antons Esson",
                    "email": "aesson1@ning.com"
                },
                {
                    "value": 3,
                    "name": "Ardeen Batisse",
                    "email": "abatisse2@nih.gov"
                },
                {
                    "value": 4,
                    "name": "Graeme Yellowley",
                    "email": "gyellowley3@behance.net"
                },
                {
                    "value": 5,
                    "name": "Dido Wilford",
                    "email": "dwilford4@jugem.jp"
                },
                {
                    "value": 6,
                    "name": "Celesta Orwin",
                    "email": "corwin5@meetup.com"
                },
                {
                    "value": 7,
                    "name": "Sally Main",
                    "email": "smain6@techcrunch.com"
                },
                {
                    "value": 8,
                    "name": "Grethel Haysman",
                    "email": "ghaysman7@mashable.com"
                },
                {
                    "value": 9,
                    "name": "Marvin Mandrake",
                    "email": "mmandrake8@sourceforge.net"
                },
                {
                    "value": 10,
                    "name": "Corrie Tidey",
                    "email": "ctidey9@youtube.com"
                },
                {
                    "value": 11,
                    "name": "foo",
                    "email": "foo@bar.com"
                },
                {
                    "value": 12,
                    "name": "foo",
                    "email": "foo.aaa@foo.com"
                },
            ]
        })

        tagify.on('dropdown:show dropdown:updated', onDropdownShow)
        tagify.on('dropdown:select', onSelectSuggestion)

        var addAllSuggestionsElm;

        function onDropdownShow(e) {
            var dropdownContentElm = e.detail.tagify.DOM.dropdown.content;

            if (tagify.suggestedListItems.length > 1) {
                addAllSuggestionsElm = getAddAllSuggestionsElm();

                // insert "addAllSuggestionsElm" as the first element in the suggestions list
                dropdownContentElm.insertBefore(addAllSuggestionsElm, dropdownContentElm.firstChild)
            }
        }

        function onSelectSuggestion(e) {
            if (e.detail.elm == addAllSuggestionsElm)
                tagify.dropdown.selectAll();
        }

        // create a "add all" custom suggestion element every time the dropdown changes
        function getAddAllSuggestionsElm() {
            // suggestions items should be based on "dropdownItem" template
            return tagify.parseTemplate('dropdownItem', [{
                class: "addAll",
                name: "Ajouter tous",
                email: tagify.whitelist.reduce(function(remainingSuggestions, item) {
                    return tagify.isTagDuplicate(item.value) ? remainingSuggestions :
                        remainingSuggestions + 1
                }, 0) + " Clients"
            }])
        }
    </script>

</body>

</html>
