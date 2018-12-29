<template>
    <div class="modal is-active" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <slot name="title"></slot>
                <button type="button" class="close" @click="$emit('close')">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <slot name="body"></slot>
            </div>
            <div class="modal-footer">
                <slot name="footer"></slot>
            </div>
        </div>
      </div>
    </div>
</template>

<script>
    export default {

    }
</script>
