<template>

<div class="modal-body">
    <form enctype="multipart/form-data">
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control "
                    name="name"  autocomplete="name" autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="phone"
                class="col-md-4 col-form-label text-md-right">Phone Number</label>

            <div class="col-md-6">
                <input id="phone" type="number" class="form-control "
                    name="phone"  autocomplete="phone">
            </div>
        </div>
        <div class="form-group row">
            <label for="email"
                class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control "
                    name="email"  autocomplete="email">
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

            <div class="col-md-6">
                <input id="address" type="text" class="form-control "
                    name="address"  autocomplete="address">
            </div>
        </div>
        <div class="form-group row">
            <label for="age" class="col-md-4 col-form-label text-md-right">Age</label>

            <div class="col-md-6">
                <input id="age" type="text" class="form-control "
                    name="age"  autocomplete="age">
            </div>
        </div>
        <div class="form-group row">
            <label for="avater" class="col-md-4 col-form-label text-md-right">Avater</label>

            <div class="col-md-6">
                <input id="avater" type="file" class="form-control "
                    name="avater"  autocomplete="avater">
            </div>
        </div>


        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary" @click.prevent="store">
                    Store
                </button>
            </div>
        </div>
    </form>
</div>
</template>

<script>
    export default {
        methods:{
            store(){
                let form = $('form').serialize();
                axios.post('/vue-todo',form)
                .then(res=>{
                    console.log(res);
                })
                .catch(err=>{
                    console.log(this.errors = err.errors);
                });
            }
        },
    }
</script>

<style scoped>

</style>
