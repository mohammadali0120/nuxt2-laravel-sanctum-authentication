<template>
  <div>
    <div
      v-for="(product, index) in products"
      :key="product.id"
      :class="index !== products.length - 1 ? 'mb-6' : ''"
    >
      <div class="mb-4">
        <p class="font-bold text-2xl">#{{ product.id }}: {{ product.name }}</p>
      </div>
      <div class="mb-4">
        <p>{{ product.description }}</p>
      </div>
      <div>
        <p>
          {{ product.price }}
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ProductsPage',
  data() {
    return {
      products: [],
    }
  },
  async fetch() {
    const response = await this.$axios.get('/api/products')

    this.products = response.data.data
  },
}
</script>

<style></style>
