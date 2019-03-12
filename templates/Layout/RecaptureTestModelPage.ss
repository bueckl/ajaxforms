<% include SideBar %>
<div class="container content-container unit size3of4 lastUnit">
    <article>
        <h1>$Title</h1>
        <div class="content">$Content</div>
    </article>


    <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#default">Default</a></li>
        <li><a href='#modal'>Modal</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="default">

            <div class="FormHolder">
                $Form

                <br />
                <br />
                <br />
                <br />

            </div>

        </div>
        <div class="tab-pane" id="modal">

            <br />
            <br />

            <!-- Button to trigger modal -->
            <a id="ModalEnquiryFormTrigger" href='#myModal' role="button" class="btn btn-primary">Launch demo modal</a>


            <br />
            <br />

        </div>
    </div>

    <script>
        $('#myTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        })
    </script>


    $PageComments

</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Kontakt</h4>
            </div>
            <div class="modal-body">
                <%-- the body is loaded via AJAX --%>
                <img src="/mysite/images/spinner.gif" style="display: block; margin: auto;" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Schliessen</button>

                <% loop $ModalForm.Actions %>$Field<% end_loop %>

                <%-- <button type="button" class="btn btn-primary">Abschicken</button> --%>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
