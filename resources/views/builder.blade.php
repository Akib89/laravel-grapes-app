<!DOCTYPE html>
<html lang="bn">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport"
         content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
      <title>GrapesJS Builder</title>
      <!-- Google Material Symbols Outlined (optimized with display=swap) -->
      <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap" rel="stylesheet" />
      <!-- GrapesJS Core CSS -->
      <link href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet" />
      <link href="https://unpkg.com/grapesjs-preset-webpage/dist/grapesjs-preset-webpage.min.css" rel="stylesheet" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

      <style>
         body,
         html {
         margin: 0;
         height: 100%;
         }
         #gjs {
         height: 100vh;
         }
         .block-label {
         text-align: center;
         font-size: 12px;
         line-height: 1.1;
         display: flex;
         flex-direction: column;
         align-items: center;
         justify-content: center;
         padding: 6px;
         }
         .block-label .material-symbols-outlined {
         font-size: 10px;
         margin-bottom: 4px;
         font-variation-settings: "wght" 300;
         display: block;
         }
         .column-placeholder {
         color: #aaa;
         font-style: italic;
         pointer-events: none;
         display: flex;
         align-items: center;
         justify-content: center;
         height: 100px;
         text-align: center;
         width: 100%;
         }
         .gjs-block {
         display: inline-block;
         vertical-align: top;
         width: 50%;
         box-sizing: border-box;
         margin: 0;
         padding: 8px;
         }
         .gjs-blocks-c {
         padding: 0;
         }

.apply-now-global {
    display: block;
    width: 100%;
    padding: 4px 10px;
    background: #6c5ce7;
    color: #fff;
    border: none;
    cursor: pointer;
    font-weight: bold;
    text-align: center;
    font-size: 15px;
}

.apply-now-global {
    position: sticky;
    bottom: 0;
}


      </style>
   </head>
   <body>
      <div id="gjs"></div>
      <!-- Bootstrap Modal -->
<div class="modal fade" id="saveModal" tabindex="-1" aria-labelledby="saveModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 12px;">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="saveModalLabel">Template Saved</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fs-5 text-center" id="saveModalMessage">
        Your template has been saved successfully.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Okay</button>
      </div>
    </div>
  </div>
</div>

      <!-- GrapesJS Core JS -->
      <script src="https://unpkg.com/grapesjs"></script>
      <script src="https://unpkg.com/grapesjs-preset-webpage"></script>
      <script>
         const editor = grapesjs.init({
           container: "#gjs",
           height: "100%",
           width: "auto",
           allowScripts: 1,
           plugins: ["grapesjs-preset-webpage"],
           pluginsOpts: {
             "grapesjs-preset-webpage": {
               blocks: [],
             },
           },
           canvas: {
             styles: [
               "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css",
               "{{ asset('css/stylesheet.css') }}",
             ],
             scripts: [
               "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js",
             ],
           },
         });
         
         // Placeholder component
         editor.DomComponents.addType("placeholder", {
           model: {
             defaults: {
               tagName: "div",
               editable: false,
               selectable: false,
               droppable: false,
               highlightable: false,
               attributes: {
                 class: "column-placeholder",
                 contenteditable: "false",
               },
             },
           },
         });
         
         // Remove placeholder when something is dropped into the column
         editor.on("component:add", (component) => {
           const parent = component.parent();
           if (!parent) return;
         
           const isColumn =
             parent.getClasses().includes("col") ||
             parent.getClasses().some((cls) => cls.startsWith("col-"));
         
           if (isColumn && component.get("type") !== "placeholder") {
             const placeholders = parent
               .components()
               .filter((c) => c.get("type") === "placeholder");
             placeholders.forEach((p) => p.remove());
           }
         });
         
         // ===== SAVE COMMAND (Apply Now button uses this) =====
    editor.Commands.add("save-to-session", {
    run(editor) {
        const html = editor.getHtml();
        const css  = editor.getCss();

        fetch("{{ asset('save.php') }}?uid={{ $uid }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                slug: "{{ $slug }}",
                php: html,
                css: css
            })
        })
        .then(res => res.text())
        .then(msg => {
            const modalBody = document.getElementById("saveModalMessage");
            modalBody.innerHTML = msg;

            const saveModal = new bootstrap.Modal(document.getElementById('saveModal'));
            saveModal.show();
        })
        .catch(err => {
            const modalBody = document.getElementById("saveModalMessage");
            modalBody.innerHTML = "Error saving: " + err;

            const saveModal = new bootstrap.Modal(document.getElementById('saveModal'));
            saveModal.show();
        });
    }
});


         
         // ===== AUTO-SAVE ON UPDATE =====
        //  editor.on("update", () => {
        //    const html = editor.getHtml();
        //    const css  = editor.getCss();
         
        //    fetch("{{ asset('session_save.php') }}?uid={{ $uid }}", {
        //      method: "POST",
        //      headers: {
        //        "Content-Type": "application/json"
        //      },
        //      body: JSON.stringify({
        //        slug: "{{ $slug }}",
        //        html: html,
        //        css: css
        //      })
        //    }).catch(err => console.error("Auto-save error:", err));
        //  });
         
         function createLabel(text, iconName, weight = 300) {
           return `
             <div class="block-label">
               <span class="material-symbols-outlined"
                     style="font-variation-settings: 'wght' ${weight}; font-size: 36px;">
                 ${iconName}
               </span>
               ${text}
             </div>
           `;
         }
         
         // ===== LAYOUT BLOCKS =====
         editor.BlockManager.add("1-column", {
           label: createLabel("1 Column", "check_box_outline_blank"),
           category: "Layout",
           content: `
           <div class="container-fluid px-2">
             <div class="row">
               <div class="col p-2 text-center" data-gjs-droppable="true">
                 <div class="column-placeholder" data-gjs-type="placeholder"> Column</div>
               </div>
             </div>
           </div>
         `,
         });
         
         editor.BlockManager.add("2-columns", {
           label: createLabel("2 Columns", "view_agenda"),
           category: "Layout",
           content: `
           <div class="container-fluid px-2">
             <div class="row">
               <div class="col-6 p-2 text-center" data-gjs-droppable="true">
                 <div class="column-placeholder" data-gjs-type="placeholder"> Column</div>
               </div>
               <div class="col-6 p-2 text-center" data-gjs-droppable="true">
                 <div class="column-placeholder" data-gjs-type="placeholder"> Column</div>
               </div>
             </div>
           </div>
         `,
         });
         
         editor.BlockManager.add("3-columns", {
           label: createLabel("3 Columns", "view_column"),
           category: "Layout",
           content: `
           <div class="container-fluid px-2">
             <div class="row">
               <div class="col-md-4 p-2 text-center" data-gjs-droppable="true">
                 <div class="column-placeholder text-center" data-gjs-type="placeholder">Column</div>
               </div>
               <div class="col-md-4 p-2 text-center" data-gjs-droppable="true">
                 <div class="column-placeholder" data-gjs-type="placeholder">Column</div>
               </div>
               <div class="col-md-4 p-2 text-center" data-gjs-droppable="true">
                 <div class="column-placeholder" data-gjs-type="placeholder">Column</div>
               </div>
             </div>
           </div>
         `,
         });
         
         editor.BlockManager.add("3-1-columns", {
           label: createLabel("1/4 + 3/4", "view_week"),
           category: "Layout",
           content: `
         <div class="container-fluid px-2">
           <div class="row">
             <div class="col-3 p-2 text-center" data-gjs-droppable="true">
               <div class="column-placeholder" data-gjs-type="placeholder"> 1/4 Column</div>
             </div>
             <div class="col-9 p-2 text-center" data-gjs-droppable="true">
               <div class="column-placeholder" data-gjs-type="placeholder"> 3/4 Column</div>
             </div>
           </div>
         </div>
         `,
         });
         
         // ===== BASIC / TYPOGRAPHY / MEDIA BLOCKS =====
         editor.BlockManager.add("section", {
           label: createLabel("Section", "article"),
           category: "Basic",
           content: `
           <section class="container py-4">
             <h1>Section Title</h1>
             <p>Section content...</p>
           </section>
         `,
         });
         
         editor.BlockManager.add("divider", {
           label: createLabel("Divider", "remove"),
           category: "Basic",
           content: "<hr/>",
         });
         
         editor.BlockManager.add("heading", {
           label: createLabel("Heading", "title"),
           category: "Typography",
           content: "<h1>This is a heading</h1>",
         });
         
         editor.BlockManager.add("text", {
           label: createLabel("Text", "text_fields"),
           category: "Typography",
           content: "<p>Insert your text here</p>",
         });
         
         editor.BlockManager.add("link", {
           label: createLabel("Link", "link"),
           category: "Basic",
           content: '<a href="https://example.com">Link</a>',
         });
         
         editor.BlockManager.add("link-box", {
           label: createLabel("Link Box", "link"),
           category: "Basic",
           content: `
           <div class="p-3 border">
             <a href="https://example.com">Boxed Link</a>
           </div>
         `,
         });
         
         editor.BlockManager.add("image", {
           label: createLabel("Image", "image"),
           category: "Media",
           content:
             '<img src="https://via.placeholder.com/150" class="img-fluid" alt="Image"/>',
         });
         
         editor.BlockManager.add("image-box", {
           label: createLabel("Image Box", "photo_frame"),
           category: "Media",
           content: `
           <div class="p-3 border">
             <img src="https://via.placeholder.com/150" class="img-fluid" alt="Image"/>
           </div>
         `,
         });
         
        editor.BlockManager.add("video", {
  label: createLabel("Video", "smart_display"),
  category: "Media",
  content: `
    <div class="ratio ratio-16x9">
      <video controls src="https://www.w3schools.com/html/mov_bbb.mp4">
      </video>
    </div>
  `,
});

         editor.BlockManager.add("map", {
           label: createLabel("Map", "map"),
           category: "Media",
           content: `
           <div class="ratio ratio-16x9">
             <iframe src="https://maps.google.com/maps?q=New York&t=&z=13&ie=UTF8&iwloc=&output=embed"
                     frameborder="0" style="border:0;" allowfullscreen></iframe>
           </div>
         `,
         });
         
         editor.BlockManager.add("icon", {
           label: createLabel("Icon", "star"),
           category: "Media",
           content:
             '<span class="material-symbols-outlined" style="font-variation-settings: \'wght\' 300; font-size: 48px;">star</span>',
         });
         
         // ===== ON LOAD =====
editor.on("load", () => {
    editor.Panels.getButton("views", "open-blocks").set("active", true);

    // Add Apply Now to TOP RIGHT PANEL
    editor.Panels.addButton("options", {
        id: "apply-now-top",
        label: "Apply Now",
        className: "apply-now-global top-apply-btn",
        command: "save-to-session",
        attributes: { title: "Save Template" }
    });

    @if (!empty($htmlBody))
        editor.setComponents(`{!! $htmlBody !!}`);
    @endif
});





      </script>
   </body>
</html>


