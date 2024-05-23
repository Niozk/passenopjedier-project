import { defineEventHandler, getQuery } from "h3";

export default defineEventHandler(async (event) => {
    const query = getQuery(event);

    try {   
        // Fetch filtered pet sitting requests
        const petSitters = await $fetch('http://localhost:80/api/filter/pet-sitters', {
            method: 'GET',
            query: query,
        });
        
        return petSitters
    }
    catch (error) {
        return error
    }
})