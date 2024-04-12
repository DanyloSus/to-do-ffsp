import mongoose from "mongoose";

export const connectMongoDB = async () => {
    const MONGODB_URI = process.env.MONGODB_URI!;

    let client;

    try {
        client = await mongoose.connect(MONGODB_URI);
        console.log("DB IS CONNECTED");
      } catch (error) {
        console.log("DB IS NOT CONNECTED " + error);
        throw new Error("DB IS NOT CONNECTED " + error);
      }
}