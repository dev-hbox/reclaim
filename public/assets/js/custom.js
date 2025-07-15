const BASE_URL = window.location.origin;
$(document).ready(function () {
    function toggleTitle(element) {
        element.classList.toggle("expanded");
    }

    // Affirm data update Start

    $(".edit-btn").click(function () {
        const id = $(this).data("id");
        const title = $(this).data("title");
        const description = $(this).data("description");
        const date = $(this).data("date");

        $("#modalFormUpdate").modal("show");

        // Prefill modal form
        $("#modal-title").val(title);
        $("#modal-description").val(description);
        $("#modal-date").val(date);
        $("#affirmationForm").attr("action", `/admin/affirm-update/${id}`);

        $("#modalTitle").text("Update Affirmation");
        $("#modal-submit-btn").text("Update Affirmation");
    });

    // Affirm data update End

    // Questionnaire form Start

    $("#addQuestionBtn").on("click", function () {
        const formAction = $(this).data("action");

        $("#questionForm").trigger("reset");
        $("#question-id").val("");
        $("#form-method").val("POST");
        $("#questionForm").attr("action", formAction);

        $("#answers-container").html(`
                <input type="text" name="answers[]" class="form-control mb-2" placeholder="Answer 1" required>
                <input type="text" name="answers[]" class="form-control mb-2" placeholder="Answer 2" required>
            `);

        $("#questionModalTitle").text("Add Question");
        $("#questionModal").modal("show");
    });

    // Add new answer field
    $("#add-answer-field").on("click", function () {
        $("#answers-container").append(`
                <input type="text" name="answers[]" class="form-control mb-2" placeholder="Another answer" required>
            `);
    });

    // Handle Edit
    $(".edit-question-btn").on("click", function () {
        let id = $(this).data("id");
        let question = $(this).data("question");
        let type = $(this).data("type");
        let answers = $(this).data("answers");

        $("#question-id").val(id);
        $("#question-text").val(question);
        $("#question-type").val(type);
        $("#form-method").val("PUT");

        let html = "";
        answers.forEach((ans, i) => {
            html += `<input type="text" name="answers[]" value="${
                ans.answer_text
            }" class="form-control mb-2" placeholder="Answer ${
                i + 1
            }" required>`;
        });
        $("#answers-container").html(html);

        $("#questionForm").attr("action", `/admin/questions/${id}`);
        $("#questionModalTitle").text("Edit Question");
        $("#questionModal").modal("show");
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    // Handle Delete
    $(".delete-question-btn").on("click", function () {
        let id = $(this).data("id");

        if (confirm("Are you sure you want to delete this question?")) {
            $.ajax({
                url: `/admin/questions/${id}`,
                type: "DELETE",
                success: function () {
                    location.reload();
                },
                error: function () {
                    alert("Failed to delete question");
                },
            });
        }
    });
    // Questionnaire form  End

    // lesson js start
    $("#avatar").on("change", function () {
        if (this.files.length > 0) {
            $("#video").prop("disabled", true);
        } else {
            $("#video").prop("disabled", false);
        }
    });

    $("#video").on("change", function () {
        if (this.files.length > 0) {
            $("#avatar").prop("disabled", true);
        } else {
            $("#avatar").prop("disabled", false);
        }
    });

    // lesson update code

    $(".edit-lesson-btn").click(function () {
        const id = $(this).data("id");
        const title = $(this).data("title");
        const description = $(this).data("description");
        const avatar = $(this).data("avatar");
        const video = $(this).data("video");

        $("#modal-lesson-id").val(id);
        $("#modal-title").val(title);
        $("#modal-description").val(description);

        $("#modal-current-avatar").html("");
        $("#modal-current-video").html("");

        if (avatar) {
            $("#modal-current-avatar").html(`
                    <img src="${BASE_URL}${avatar}" class="img-fluid mb-2" style="max-width: 200px;">
                `);
        }

        if (video) {
            $("#modal-current-video").html(`
                    <video controls width="200">
                        <source src="${BASE_URL}${video}" type="video/mp4">
                        Your browser does not support video.
                    </video>
                `);
        }

        $("#modal-avatar").val("");
        $("#modal-video").val("");
        $("#modal-avatar").prop("disabled", false);
        $("#modal-video").prop("disabled", false);

        $("#lessonUpdateForm").attr(
            "action",
            BASE_URL + "/admin/lesson-update/" + id
        );

        $("#modalFormUpdate").modal("show");
    });

    $("#modal-avatar").change(function () {
        if (this.files.length > 0) {
            $("#modal-video").prop("disabled", true);
        } else {
            $("#modal-video").prop("disabled", false);
        }
    });

    $("#modal-video").change(function () {
        if (this.files.length > 0) {
            $("#modal-avatar").prop("disabled", true);
        } else {
            $("#modal-avatar").prop("disabled", false);
        }
    });
});
