var uploadField = $('input[type="file"]');

$(document).on('change', 'input[type="file"]', function() {
    var $this = $(this);
    $(this.files).each(function(key, value) {
        if ((value.size / 1024) > 10240) {
            alert('"' + value.name + '"' + 'exceeds limit of maximum file upload size')
            $this.val("");
        }
    })
})

document.addEventListener('DOMContentLoaded', function () {
    const tagsInput = document.getElementById('tags-input');
    const tagsDisplay = document.getElementById('tags-display');
    const tagsHidden = document.getElementById('tags-hidden');
    let tags = [];

    // Initialize tags array with existing tags (if any)
    const initialTags = tagsInput.value.trim().split(',').map(tag => tag.trim()).filter(tag => tag);
    tags = [...initialTags];

    function updateHiddenInput() {
        tagsHidden.value = tags.join(',');
    }

    function renderTags() {
        tagsDisplay.innerHTML = '';
        tags.forEach((tag, index) => {
            const tagElement = document.createElement('span');
            tagElement.classList.add('tag');
            tagElement.innerHTML = `${tag} <button type="button" data-index="${index}" class="remove-tag">x</button>`;
            tagsDisplay.appendChild(tagElement);
        });
        updateHiddenInput();
    }

    tagsInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter' && tagsInput.value.trim() !== '') {
            e.preventDefault();
            if (!tags.includes(tagsInput.value.trim())) {
                tags.push(tagsInput.value.trim());
                renderTags();
            }
            tagsInput.value = '';
        }
    });

    tagsDisplay.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-tag')) {
            const index = e.target.getAttribute('data-index');
            tags.splice(index, 1);
            renderTags();
        }
    });

    // Render existing tags when the page loads for the first time
    renderTags();
});




$(function () {
    let $table = $('#blogsDataTable');
    let table = $table.DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "order": [[0, "asc"]],
        "columns"   : [
           {
                data: null,
                name: "id",
                searchable: false,
                render: function (data, type, row, meta) {
                    return meta.row + 1 + meta.settings._iDisplayStart;
                },
            },
            {data: 'title', name: 'title'},
            {data: 'category', name: 'category'},
            {data: 'action', name: 'action',searchable: false ,  bSortable: false}
        ],
        "processing": true,
        "serverSide": true,
        "ajax": ""
    });
});
