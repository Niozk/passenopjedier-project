import { defineEventHandler, getQuery } from "h3";

export default defineEventHandler(async (event) => {
    try {   
        const petSitters = await $fetch('http://localhost:80/api/users', {
            method: 'GET',
        });
        
        return petSitters
    }
    catch (error) {
        return error
    }
})