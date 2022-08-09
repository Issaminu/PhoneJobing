<script>
    var inputElm = document.querySelector('input[name=clients]');

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

        whitelist: {!! $clients !!}


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
