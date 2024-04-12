import { connectMongoDB } from "@/lib/mongodb/mongodb";
import ToDo from "@/models/ToDo";
import { NextRequest, NextResponse } from "next/server";

export async function POST(req: NextRequest) {
  try {
    await connectMongoDB();

    const data = await req.json();

    const { title, description } = data;

    if (
      !title ||
      !description ||
      title.trim() === "" ||
      description.trim() === ""
    ) {
      return NextResponse.json(
        {
          message: "Not correct input",
        },
        { status: 422 }
      );
    }

    const newData = {
      ...data,
      completed: false,
    };

    const toDo = await ToDo.create(newData);

    return NextResponse.json({ toDo });
  } catch (error) {
    return NextResponse.json(`${error} sus`, { status: 500 });
  }
}
