import { defineEventHandler, getQuery } from "h3";

export default defineEventHandler(async (event) => {
    try {   
        const petSittingRequests = await $fetch('http://localhost:80/api/pet-sitting-requests', {
            method: 'GET',
        });
        
        return petSittingRequests
    }
    catch (error) {
        return error
    }
})