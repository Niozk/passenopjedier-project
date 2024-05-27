import { defineEventHandler, getQuery } from "h3";

export default defineEventHandler(async (event) => {
    const query = getQuery(event);

    try {   
        const petSittingRequests = await $fetch('http://localhost:80/api/filter/pet-sitting-requests', {
            method: 'GET',
            query: query,
        });
        
        return petSittingRequests
    }
    catch (error) {
        return error
    }
})