<template>
    <input
        type="submit"
        class="btn btn-danger d-block w-100 mb-2"
        value="Eliminar ×"
        @click="eliminarReceta"
    >
</template>

<script>
    export default {
        props: ['recetaId'],
        mounted(){
            console.log('receta actual', this.recetaId);
        },
        methods: {
            eliminarReceta(){
                this.$swal({
                    title: '¿Deseas eliminar esta receta?',
                    text: "Una vez eliminada, no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'No'
                }).then((result) => {

                    // Enviar peticion al servidor

                    if (result.isConfirmed) {
                        this.$swal({
                            title: 'Receta eliminada',
                            text: 'Se elimino la receta',
                            icon: 'success'
                        })
                    }
                })

            }
        }

    }


</script>
