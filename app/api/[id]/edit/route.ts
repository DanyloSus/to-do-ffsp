import { connectMongoDB } from "@/lib/mongodb/mongodb";
import ToDo from "@/models/ToDo";
import { NextRequest, NextResponse } from "next/server";

export async function PUT(
  req: NextRequest,
  { params }: { params: { id: string } }
) {
  const { id } = params;
  const data = await req.json();

  const { title, description } = data;

  console.log(data);

  if (
    !title ||
    !description ||
    title.trim() === "" ||
    description.trim() === ""
  ) {
    return NextResponse.json(
      {
        error: "Not correct input",
      },
      { status: 422 }
    );
  }

  try {
    await connectMongoDB();

    await ToDo.findOneAndUpdate(
      { _id: id },
      {
        ...data,
      }
    );

    return NextResponse.json({ message: "ToDo edited!" });
  } catch (error) {
    return NextResponse.json(error, { status: 500 });
  }
}
