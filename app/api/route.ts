import { connectMongoDB } from "@/lib/mongodb/mongodb";
import ToDo from "@/models/ToDo";
import { NextRequest, NextResponse } from "next/server";

export async function GET(req: NextRequest) {
  try {
    await connectMongoDB();

    const toDos = await ToDo.find();

    return NextResponse.json({ toDos });
  } catch (error) {
    return NextResponse.json(`${error} sus`, { status: 500 })
  }
}
