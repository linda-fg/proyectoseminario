<form id="frmResetearPassword" method="POST" onsubmit="return resetPassword()">
    <!-- Modal -->
    <div class="modal fade" id="modalResetPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reestablecer password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" hidden id="idUsuarioReset" name="idUsuarioReset">
                <label for="">Escribe tu nueva password</label>
                <input type="password" name="passwordReset" id="passwordReset" required class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-outline-success">Actualizar password</button>
            </div>
            </div>
        </div>
    </div>
</form>