<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <router-link :to="{name: 'List'}" class="btn btn-outline-primary">List</router-link>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="UpdateData">
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" v-model="formData.product_name" class="form-control"
                                       id="product_name">
                                <span class="text-danger" v-for="(error, index) in formError.product_name" :key="index">{{
                                        error
                                    }}</span>
                            </div>
                            <div class="form-group">
                                <label for="product_price">Price</label>
                                <input type="text" v-model="formData.product_price" class="form-control"
                                       id="product_price">
                                <span class="text-danger" v-for="(error, index) in formError.product_price"
                                      :key="index">{{ error }}</span>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

export default {
    data() {
        return {
            formData: {
                product_name: '',
                product_price: '',
            },
            formError: {
                product_name: '',
                product_price: '',
            }
        }
    },
    mounted() {
        this.edit();
    },
    methods: {
        edit() {
            axios.get('/api/product/show/' + this.$route.params.id)
                .then((success) => {
                    this.formData = success.data.product;
                }).catch((error) => {
                console.log(error);
            });
        },
        UpdateData() {
            axios.post('/api/product/update/' + this.$route.params.id, this.formData)
                .then((success) => {
                    this.$router.push({name: 'List'});
                }).catch((error) => {
                this.formError.product_name = error.response.data.errors.product_name;
                this.formError.product_price = error.response.data.errors.product_price;
            });
        },
    }
};
</script>

<style lang="scss" scoped>

</style>
