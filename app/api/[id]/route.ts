import { connectMongoDB } from "@/lib/mongodb/mongodb";
import ToDo from "@/models/ToDo";
import { NextRequest, NextResponse } from "next/server";

export async function GET(
  req: NextRequest,
  { params }: { params: { id: string } }
) {
  const { id } = params;

  try {
    await connectMongoDB();

    const toDo = await ToDo.findOne({ _id: id });

    return NextResponse.json({ toDo });
  } catch (error) {
    return NextResponse.json(error, { status: 500 });
  }
}
