import { defineEventHandler, readBody } from "h3";

export default defineEventHandler(async (event) => {
    
    const body = await readBody(event)

    try {   
        const response = await $fetch('http://localhost:80/api/users/login', {
            method: 'POST',
            body: body,
        })
        return response
    }
    catch (error) {
        return error
    }
})