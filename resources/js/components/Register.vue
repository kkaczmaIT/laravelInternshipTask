<template>
    <div>
                <label for="name" class="form-label">Imię</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div>
                <label for="password" class="form-label">Hasło</label>
                <input type="password" class="form-control" name="password">
            </div> 
            <button type="submit" class="btn btn-primary mt-4">Zarejestruj się</button>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
