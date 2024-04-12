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

export async function PUT(
  req: NextRequest,
  { params }: { params: { id: string } }
) {
  const { id } = params;
  const data = await req.json();

  console.log(data);
  try {
    await connectMongoDB();

    await ToDo.findOneAndUpdate(
      { _id: id },
      {
        completed: !data.completed,
      }
    );

    return NextResponse.json({ message: "ToDo toogled!" });
  } catch (error) {
    return NextResponse.json(error, { status: 500 });
  }
}

export async function DELETE(
  req: NextRequest,
  { params }: { params: { id: string } }
) {
  const { id } = params;
  try {
    await connectMongoDB();

    await ToDo.findOneAndDelete({ _id: id });

    return NextResponse.json({ message: "ToDo deleted!" });
  } catch (error) {
    return NextResponse.json(error, { status: 500 });
  }
}
